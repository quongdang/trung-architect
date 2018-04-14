import { BrowserModule } from '@angular/platform-browser';
import { HttpModule } from '@angular/http';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { AppRoutingModule } from './app-routing.module';
import { SidebarModule } from 'ng-sidebar';
import { NgxCarouselModule } from 'ngx-carousel';
import { GoTopButtonModule } from 'ng2-go-top-button';
import 'hammerjs';
import 'rxjs/Rx';

import { AppComponent } from './app.component';
import { HomeComponent } from './home/home.component';
import { AboutComponent } from './about/about.component';
import { SidebarComponent } from './sidebar/sidebar.component';
import { FooterComponent } from './footer/footer.component';



@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    AboutComponent,
    SidebarComponent,
    FooterComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
	FormsModule,
	BrowserAnimationsModule,
	SidebarModule.forRoot(),
	NgxCarouselModule,
	GoTopButtonModule,
	HttpModule,
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
