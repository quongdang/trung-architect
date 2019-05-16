import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import {TranslateService} from '@ngx-translate/core';

@Component({
  selector: 'app-footer',
  templateUrl: './footer.component.html',
  styleUrls: ['./footer.component.scss']
})
export class FooterComponent implements OnInit {

  constructor(
    private router: Router,
    private translate: TranslateService
  ) {  }

  ngOnInit() {
  }
  
  backToTop() {
    window.scroll(0,0);
  }

  contactUs() {
    this.router.navigate(['/about']);
  }
}
