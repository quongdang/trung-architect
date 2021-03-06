import { NgModule, CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { RouterModule } from '@angular/router';
import { aboutRoutes} from './about.route'
import { AboutComponent } from './about.component';

const ENTITY_STATES = [
    ...aboutRoutes
];

@NgModule({
    imports: [
        RouterModule.forChild(ENTITY_STATES)
    ],
    declarations: [
        AboutComponent,
    ],
    entryComponents: [
        AboutComponent,
    ],
    providers: [
    ],
    schemas: [CUSTOM_ELEMENTS_SCHEMA]
})
export class AboutModule {}
