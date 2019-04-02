import { Result } from './../shared/result.service';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-all-result',
  templateUrl: './all-result.component.html',
  styleUrls: ['./all-result.component.css']
})
export class AllResultComponent implements OnInit {

  all: any = [];
  
  constructor(
    public resultService: Result
    
  ) { 
    
  }

  ngOnInit() {
    this.loadAll()
  }

  // Get data list
  loadAll() {
    return this.resultService.getAllResult().subscribe(data => {
      this.all = data.result;
    })
  }

}
