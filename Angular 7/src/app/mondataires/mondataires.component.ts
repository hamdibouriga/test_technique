import { MondatairesService } from './../shared/mondataires.service';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-mondataires',
  templateUrl: './mondataires.component.html',
  styleUrls: ['./mondataires.component.css']
})
export class MondatairesComponent implements OnInit {

  Mondataires: any = [];
  
  constructor(
    public mondataireService: MondatairesService
    
  ) { 
    
  }

  ngOnInit() {
    this.loadAnnonces()
  }

  // Get data list
  loadAnnonces() {
    return this.mondataireService.getMondataire().subscribe((data: {}) => {
      this.Mondataires = data["hydra:member"];
    })
  }

}
