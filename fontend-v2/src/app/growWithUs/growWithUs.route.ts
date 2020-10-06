import { Routes } from '@angular/router';
import { GrowWithUsComponent } from  './growWithUs.component';
import { GrowWithUsDetailsComponent } from  './growWithUs-details.component';

export const growWithUsRoutes: Routes = [
    {
        path: 'grow-with-us',
        component: GrowWithUsComponent
    },
    {
        path: 'grow-with-us/:id',
        component: GrowWithUsDetailsComponent
    }
];