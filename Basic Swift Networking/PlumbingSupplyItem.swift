//
//  PlumbingSupplyItem.swift
//  Basic Swift Networking
//
//  Created by Stefan Agapie on 10/7/14.
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
