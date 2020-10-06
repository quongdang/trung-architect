import { Component, Input } from '@angular/core';
import { Router } from '@angular/router';
import { NgbActiveModal } from '@ng-bootstrap/ng-bootstrap';

@Component({
  selector: 'ngbd-modal-content',
  templateUrl: './popup-modal.content.html',
  styleUrls: [
    './popup-modal.content.scss'
  ]
})
export class PopupModalContent {
  @Input() backgroundImage;
  @Input() header;
  @Input() content;
  @Input() link;
  @Input() linkName;

  constructor(
    public activeModal: NgbActiveModal, 
    private router: Router) {
    
  }

  openLink() {
    this.router.navigate([this.link]);
  }
}