import { NgModule, CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { AboutService } from './about.service';
import { ProjectService } from './project.service';

@NgModule({
    providers: [
        AboutService,
        ProjectService
    ],
    schemas: [CUSTOM_ELEMENTS_SCHEMA]
})
export class ServiceModule {}
