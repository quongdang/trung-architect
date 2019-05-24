import { NgModule, CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { RouterModule } from '@angular/router';
import { SharedModule } from '../shared/shared.module';
import { ContactUsComponent} from './contactUs.component'
import { contactUsRoutes } from './contactUs.route';

const ENTITY_STATES = [
    ...contactUsRoutes
];

@NgModule({
    imports: [
        SharedModule,
        RouterModule.forChild(ENTITY_STATES),
    ],
    declarations: [
        ContactUsComponent,
    ],
    entryComponents: [
        ContactUsComponent,
    ],
    providers: [
    ],
    schemas: [CUSTOM_ELEMENTS_SCHEMA]
})
export class ContactUsModule {}