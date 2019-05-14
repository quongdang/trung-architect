import {Component, ViewChild} from '@angular/core';
import {TranslateService} from '@ngx-translate/core';
import {SidebarComponent} from './sidebar/sidebar.component';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  title = 'app';
  menuBarChange: boolean = false;
  @ViewChild(SidebarComponent) sidebar: SidebarComponent;

  constructor(public translate: TranslateService) {
    this.translate.setDefaultLang('vn');
    this.translate.use(this.translate.getBrowserLang());
  }

  ngOnInit() {
  }

  toogleMenu() {
    this.menuBarChange = !this.menuBarChange;
    this.sidebar._toogleSidebar();
  }

  changeMenuBar(status) {
    this.menuBarChange = status;
  }
  useLanguage(language: string) {
    this.translate.use(language);
  }
}
