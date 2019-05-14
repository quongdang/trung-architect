import { NgModule, CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { CommonModule} from '@angular/common';
import { RouterModule } from '@angular/router';
import { GrowWithUsComponent} from './growWithUs.component'
import { growWithUsRoutes } from './growWithUs.route';

const ENTITY_STATES = [
    ...growWithUsRoutes
];

@NgModule({
    imports: [
        RouterModule.forChild(ENTITY_STATES),
        CommonModule,
    ],
    declarations: [
        GrowWithUsComponent,
    ],
    entryComponents: [
        GrowWithUsComponent,
    ],
    providers: [
    ],
    schemas: [CUSTOM_ELEMENTS_SCHEMA]
})
export class GrowWithUsModule {}
