//
//  PlumbingSupplyInventoryTableViewController.swift
//  Basic Swift Networking
//
//  Created by Stefan Agapie on 10/9/14.
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

class PlumbingSupplyInventoryTableViewController: UITableViewController {
    
    var inventoryUrlEndpoint : String = ""
    private var webActivityIndicator : UIActivityIndicatorView = UIActivityIndicatorView(activityIndicatorStyle: UIActivityIndicatorViewStyle.WhiteLarge)
    
    var urlSession = NSURLSession.sharedSession()
    var dataSource : Array<PlumbingSupplyItem> = []
    
    let backgroundQueue : dispatch_queue_t = dispatch_queue_create("com.aGupieWare.SwiftNetworking.backgroundQueue", nil)
    
    // MARK: Version Two (Download Image Asset with Caching)
//    let imageCache : NSCache = NSCache()

    // MARK: - View Lifecycle
    
    override func viewDidLoad() {
        super.viewDidLoad()

        self.webActivityIndicator.color = UIColor.lightGrayColor()
        self.webActivityIndicator.startAnimating()
        self.webActivityIndicator.center = self.view.center
        self.view.addSubview(self.webActivityIndicator)
    }
    
    override func viewDidAppear(animated: Bool) {
        super.viewDidAppear(animated)
        
        self.requestInventory(self.inventoryUrlEndpoint, { (error, items) -> () in

        })
    }

    // MARK: - Table view data source

    override func numberOfSectionsInTableView(tableView: (UITableView!)) -> Int {
        // Return the number of sections.
        return 1
    }

    override func tableView(tableView: (UITableView!), numberOfRowsInSection section: Int) -> Int {
        // Return the number of rows in the section.
        return self.dataSource.count
    }
    
    override func tableView(tableView: UITableView, cellForRowAtIndexPath indexPath: NSIndexPath) -> UITableViewCell {
        let cell : UITableViewCell = tableView.dequeueReusableCellWithIdentifier("Cell", forIndexPath: indexPath) as UITableViewCell
        cell.textLabel.text = ""
        cell.imageView.image = nil
        
        var supplyItem : PlumbingSupplyItem = self.dataSource[indexPath.row]
        cell.textLabel.text = supplyItem.bsn_name
        
        // endpoint of corresponding supply item image //
        let urlString : String = supplyItem.bsn_image!

        // MARK: Version One (Download Image Asset)
        dispatch_async(self.backgroundQueue, { () -> Void in
            
            /* capture the index of the cell that is requesting this image download operation */
            var capturedIndex : NSIndexPath? = indexPath.copy() as? NSIndexPath
            
            var err : NSError?
            /* get url for image and download raw data */
            let url = NSURL(string: urlString)!
            var imageData : NSData? = NSData(contentsOfURL: url, options: NSDataReadingOptions.DataReadingMappedIfSafe, error: &err)
            
            if err == nil {
                
                dispatch_sync(dispatch_get_main_queue(), { () -> Void in
                    
                    /* create a UIImage object from the downloaded data */
                    let itemImage = UIImage(data:imageData!)
                    /* get the index of one of the cells that is currently being displayed */
                    let currentIndex = tableView.indexPathForCell(cell)
                    
                    // compare the captured cell index to some current cell index       //
                    // if the captured cell index is equal to some current cell index   //
                    // then the cell that requested the image is still on the screen so //
                    // we present the downloaded image else we do nothing               //
                    if currentIndex?.item == capturedIndex!.item {
                        cell.imageView.image = itemImage
                        cell.setNeedsLayout()
                    }
                })
            }
        })

        // MARK: Version Two (Download Image Asset with Caching)
//        // if our local cache does contain the image  //
//        // then we load it from cache else we request //
//        // it from our web service                    //
//        if self.imageCache.objectForKey(urlString) != nil {
//            cell.imageView.image = self.imageCache.objectForKey(urlString) as? UIImage
//        }
//        else {
//            weak var weakSelf : PlumbingSupplyInventoryTableViewController? = self
//            
//            dispatch_async(self.backgroundQueue, { () -> Void in
//                
//                let url = NSURL(string: urlString)!
//                var capturedIndex : NSIndexPath? = indexPath.copy() as? NSIndexPath
//                var err : NSError?
//                var imageData : NSData? = NSData(contentsOfURL: url, options: NSDataReadingOptions.DataReadingMappedIfSafe, error: &err)
//                
//                if err == nil {
//                    
//                    dispatch_sync(dispatch_get_main_queue(), { () -> Void in
//                        
//                        let itemImage = UIImage(data:imageData!)
//                        let currentIndex = tableView.indexPathForCell(cell)
//                        
//                        if currentIndex?.item == capturedIndex!.item {
//                            cell.imageView.image = itemImage
//                            cell.setNeedsLayout()
//                        }
//                        weakSelf!.imageCache.setObject(itemImage!, forKey: urlString)
//                    })
//                }
//            })
//        }
        
        return cell
    }


    // MARK: - Navigation

    // In a storyboard-based application, you will often want to do a little preparation before navigation
    override func prepareForSegue(segue: UIStoryboardSegue, sender: AnyObject!) {
        let destViewController = segue.destinationViewController as PlumbingSupplyItemDescriptionViewController
        let selectedCell = sender as UITableViewCell
        let selectedIndex = self.tableView.indexPathForCell(selectedCell)
        destViewController.bsn_plumbingItem = self.dataSource[selectedIndex!.row]
        destViewController.bsn_capturedImage = selectedCell.imageView.image
    }
    
    // MARK: - Networking
    func requestInventory(endPointURL : String, responseHandler : (error : NSError? , items : Array<PlumbingSupplyItem>?) -> () ) -> () {
        
        let url:NSURL = NSURL(string: endPointURL)!
        let task = self.urlSession.dataTaskWithURL(url, completionHandler: { (data, response, error) -> Void in
            
            self.dataSource = self.inventoryItems(data)
            
            // artificially expand the data source by reusing the same objects //
            for index in 1...5 { self.dataSource += self.dataSource; }
            
            dispatch_async(dispatch_get_main_queue()!, { () -> Void in
                self.tableView.reloadData()
                self.webActivityIndicator.hidden = true
            })
            
            responseHandler( error: nil, items: nil)
        })
        task.resume()
    }
    
    func inventoryItems(data: NSData) -> (Array<PlumbingSupplyItem>) {
        
        // convert the JSON response data into a NSDictionary //
        var jsonParseError: NSError?
        var jsonResult = NSJSONSerialization.JSONObjectWithData(data, options: NSJSONReadingOptions.MutableContainers, error: &jsonParseError) as NSDictionary
        var rawInventoryItems = jsonResult["data"] as Array<Dictionary<String,String>>
        
        // convert the NSDictinary Foundation object into individual data object //
        // and place these objects into a single response array that is returned //
        var refinedInventoryItems : Array<PlumbingSupplyItem> = []
        for itemDict in rawInventoryItems {
            var item : PlumbingSupplyItem = PlumbingSupplyItem(bsn_id: itemDict["id"], bsn_name: itemDict["name"], bsn_image: itemDict["image"], bsn_description: itemDict["description"])
            refinedInventoryItems.append(item)
        }
        return refinedInventoryItems
    }
}
