import { Component, Input, OnInit, TemplateRef } from '@angular/core';
import { Router } from '@angular/router';
import {  BsModalService, BsModalRef } from 'ngx-bootstrap';

@Component({
  selector: 'ngbd-modal-content',
  templateUrl: './popup-modal.content.html',
  styleUrls: [ './popup-modal.content.scss']
})
export class PopupModalContent implements OnInit {
  @Input() backgroundImage;
  @Input() header;
  @Input() content;
  @Input() link;
  @Input() linkName;

  modalRef: BsModalRef;

  constructor(
    public modalService: BsModalService, 
    private router: Router) {
    
  }

  ngOnInit() {

  }

  openModalWithClass( template: TemplateRef<any>) {
    this.modalRef = this.modalService.show(template);
  }

  openLink() {
    this.router.navigate([this.link]);
  }
}