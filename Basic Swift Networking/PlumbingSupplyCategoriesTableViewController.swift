//
//  PlumbingSupplyCategoriesTableViewController.swift
//  Basic Swift Networking
//
//  Created by Stefan Agapie on 10/11/14.
//  Copyright (c) 2014 aGupieWare. All rights reserved.
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
