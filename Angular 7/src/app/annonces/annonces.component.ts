import { AnnoncesService } from './../shared/annonces.service';
import { Component, OnInit } from '@angular/core';


@Component({
  selector: 'app-annonces',
  templateUrl: './annonces.component.html',
  styleUrls: ['./annonces.component.css']
})
export class AnnoncesComponent implements OnInit {
  Annonces: any = [];
  
  constructor(
    public annoncesService: AnnoncesService
    
  ) { 
    
  }

  ngOnInit() {
    this.loadAnnonces()
  }

  // Get data list
  loadAnnonces() {
    return this.annoncesService.getAnnonces().subscribe((data: {}) => {
      this.Annonces = data["hydra:member"];
    })
  }

}
