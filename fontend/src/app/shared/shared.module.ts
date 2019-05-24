import { NgModule, CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { CommonModule} from '@angular/common';
import { TranslateModule } from '@ngx-translate/core';

import { PopupModalContent}  from './popup/popup-modal.content';

@NgModule({
    imports: [
        TranslateModule,
        CommonModule,
    ],
    declarations: [
        PopupModalContent,
    ],
    entryComponents: [
        PopupModalContent,
    ],
    providers: [
    ],
    exports: [
        CommonModule,
        TranslateModule
    ],
    schemas: [CUSTOM_ELEMENTS_SCHEMA]
})
export class SharedModule {}
