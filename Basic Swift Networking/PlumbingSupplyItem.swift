//
//  PlumbingSupplyItem.swift
//  Basic Swift Networking
//
//  Created by Stefan Agapie on 10/7/14.
//  Copyright (c) 2014 aGupieWare. All rights reserved.
//

import UIKit

class PlumbingSupplyItem: NSObject {
    
    var bsn_id : String? = ""
    var bsn_name : String? = ""
    var bsn_image : String? = ""
    var bsn_description : String? = ""
    
    init(var bsn_id : String?, var bsn_name : String?, var bsn_image : String?, var bsn_description : String?) {
        self.bsn_id = bsn_id
        self.bsn_name = bsn_name
        self.bsn_image = bsn_image
        self.bsn_description = bsn_description
        super.init();
    }
   
}
