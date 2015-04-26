//
//  PlumbingSupplyCategoriesTableViewController.swift
//  Basic Swift Networking
//
//  Created by Stefan Agapie on 10/11/14.
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

class PlumbingSupplyCategoriesTableViewController: UITableViewController {
    
    override func prepareForSegue(segue: UIStoryboardSegue, sender: AnyObject?) {
        
        var destViewController = segue.destinationViewController as PlumbingSupplyInventoryTableViewController
        if segue.identifier == "plumbingTools" {
            destViewController.title = "Plumbing Tools"
            destViewController.inventoryUrlEndpoint = "http://localhost:8888/api/v1/plumbing_tools.json"
        }
        else if segue.identifier == "copperPipesAndFittings" {
            destViewController.title = "Copper Pipes and Fittings"
            destViewController.inventoryUrlEndpoint = "http://localhost:8888/api/v1/copper_pipes_and_fittings.json"
        }
    }
}
