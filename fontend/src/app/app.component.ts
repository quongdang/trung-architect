import { Component, ViewChild } from '@angular/core';
import { SidebarComponent } from './sidebar/sidebar.component';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  title = 'app';
  menuBarChange: boolean = false;  
  @ViewChild(SidebarComponent) sidebar: SidebarComponent;
  
  ngOnInit() {
  }
  
  toogleMenu() {
      this.menuBarChange = !this.menuBarChange;
      this.sidebar._toogleSidebar();
  }
  
  changeMenuBar(status) {
      this.menuBarChange = status;
  }
}
