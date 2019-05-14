import { NgModule, CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { CommonModule} from '@angular/common';
import { PopupModalContent}  from './popup/popup-modal.content';

@NgModule({
    imports: [
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
    schemas: [CUSTOM_ELEMENTS_SCHEMA]
})
export class SharedModule {}
