//
//  PlumbingSupplyItemDescriptionViewController.swift
//  Basic Swift Networking
//
//  Created by Stefan Agapie on 10/25/14.
//  Copyright (c) 2014 aGupieWare. All rights reserved.
//
//  This file is part of Basic Swift Networking.
//
//  Basic Swift Networking is free software: you can redistribute it and/or modify
//  it under the terms of the GNU General Public License as published by
//  the Free Software Foundation, either version 3 of the License, or
//  (at your option) any later version.
//
//  Basic Swift Networking is distributed in the hope that it will be useful,
//  but WITHOUT ANY WARRANTY; without even the implied warranty of
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//  GNU General Public License for more details.
//
//    You should have received a copy of the GNU General Public License
//    along with Basic Swift Networking.  If not, see <http://www.gnu.org/licenses/>.
//

import UIKit

class PlumbingSupplyItemDescriptionViewController: UIViewController {

    @IBOutlet weak var bsn_imageView: UIImageView!
    @IBOutlet weak var bsn_textView: UITextView!
    var bsn_plumbingItem: PlumbingSupplyItem?
    var bsn_capturedImage: UIImage?
    
    var urlSession = NSURLSession.sharedSession()
    let backgroundQueue : dispatch_queue_t = dispatch_queue_create("com.aGupieWare.SwiftNetworking.backgroundQueue", nil)
    
    override func viewDidLoad() {
        super.viewDidLoad()

        // Do any additional setup after loading the view.   
        self.bsn_imageView.image = self.bsn_capturedImage
        
        self.bsn_textView.font = UIFont(name: "Helvetica", size: 22)
        self.bsn_textView.editable = false
        self.bsn_textView.text = "Loading. . ."
    }

    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }
        
    override func viewDidAppear(animated: Bool) {
        super.viewDidAppear(animated)

        self.title = self.bsn_plumbingItem!.bsn_name
        let url : NSURL? = self.urlForItemWithDescription(self.bsn_plumbingItem!.bsn_id!)
        self.requestItem(url, responseHandler: { (error, itemDescription) -> () in
            self.bsn_textView.text = itemDescription
        })
    }
    

    // MARK: - Ancillary Methods

    func urlForItemWithDescription(itemID : String) -> (NSURL?) {
        
        // extract the first two characters of an item's id //
        let rangeOfHello = Range(start: itemID.startIndex, end: advance(itemID.startIndex, 2))
        let prefixItemID = itemID.substringWithRange(rangeOfHello)
        
        var url : NSURL?
        
        switch prefixItemID
        {
        case "PT":
            let filePath : String = "http://localhost:8888/api/v1/plumbing_tools/\(itemID).json"
            url = NSURL(string: filePath)
        case "CP":
            let filePath : String = "http://localhost:8888/api/v1/copper_pipes_and_fittings/\(itemID).json"
            url = NSURL(string: filePath)
        default:
            url = NSURL(string: "")
        }
        return url;
    }
    
    // MARK: - Networking
    
    func requestItem(endPointURL : NSURL?, responseHandler : (error : NSError? , itemDescription : String?) -> () ) -> () {
        
        let task = self.urlSession.dataTaskWithURL(endPointURL!, completionHandler: { (data, response, error) -> Void in
            
            // convert the JSON response data into a NSDictionary //
            var jsonParseError: NSError?
            var jsonResult = NSJSONSerialization.JSONObjectWithData(data, options: NSJSONReadingOptions.MutableContainers, error: &jsonParseError) as NSDictionary
            var rawInventoryItems = jsonResult["data"] as Dictionary<String,String>
            
            dispatch_async(dispatch_get_main_queue()!, { () -> Void in
                // call our completion handler //
                responseHandler( error: nil, itemDescription: rawInventoryItems["description"])
            })
            
        })
        task.resume()
    }
}
