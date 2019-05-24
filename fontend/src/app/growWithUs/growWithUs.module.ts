import { NgModule, CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { SharedModule } from '../shared/shared.module';
import { RouterModule } from '@angular/router';
import { GrowWithUsComponent} from './growWithUs.component'
import { GrowWithUsDetailsComponent} from './growWithUs-details.component'
import { growWithUsRoutes } from './growWithUs.route';

const ENTITY_STATES = [
    ...growWithUsRoutes
];

@NgModule({
    imports: [
        RouterModule.forChild(ENTITY_STATES),
        SharedModule,
    ],
    declarations: [
        GrowWithUsComponent,
        GrowWithUsDetailsComponent,
    ],
    entryComponents: [
        GrowWithUsComponent,
        GrowWithUsDetailsComponent,
    ],
    providers: [
    ],
    schemas: [CUSTOM_ELEMENTS_SCHEMA]
})
export class GrowWithUsModule {}
