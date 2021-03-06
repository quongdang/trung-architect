import { Component, OnInit, Output, EventEmitter } from '@angular/core';
import {TranslateService} from '@ngx-translate/core';

@Component({
  selector: 'app-sidebar',
  templateUrl: './sidebar.component.html',
  styleUrls: ['./sidebar.component.scss']
})
export class SidebarComponent implements OnInit {

  public _opened:boolean = false;
  @Output() sidebarEvent = new EventEmitter<boolean>();

  constructor(private translate: TranslateService) { }

  ngOnInit() {
  }

  public _toogleSidebar() {
      this._opened = !this._opened;
      this.sidebarEvent.next(this._opened);
  }
  
  private sendEvent() {
      this.sidebarEvent.next(this._opened);
  }
}
