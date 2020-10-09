import { Component, Input, OnInit, TemplateRef } from '@angular/core';
import { Router } from '@angular/router';
import {  BsModalService, BsModalRef } from 'ngx-bootstrap';

@Component({
  selector: 'ngbd-modal-content',
  templateUrl: './popup-modal.content.html',
  styleUrls: [ './popup-modal.content.scss']
})
export class PopupModalContent implements OnInit {
  @Input() backgroundImage: any;
  @Input() header: any;
  @Input() content: any;
  @Input() link: any;
  @Input() linkName: any;

  constructor(
    public modalService: BsModalService, 
    private router: Router, private modalRef: BsModalRef) {
    
  }

  ngOnInit() {

  }

  openModalWithClass( template: TemplateRef<any>) {
    this.modalRef = this.modalService.show(template);
  }

  openLink() {
    this.router.navigate([this.link]);
  }

  doHide() {
    this.modalRef.hide();
  }
}