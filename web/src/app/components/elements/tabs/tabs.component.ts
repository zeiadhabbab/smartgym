import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-tabs',
  templateUrl: './tabs.component.html',
  styleUrls: ['./tabs.component.scss']
})
export class TabsComponent implements OnInit {
  active = 1;
  active1 = 1;
  active2 = 1;
  active3 = 1;
  constructor() { }

  ngOnInit(): void {
  }

}
