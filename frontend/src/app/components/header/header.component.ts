import { Component, OnInit } from '@angular/core';

import { AuthService } from '../../services/auth/auth.service';
import { NotificationService } from '../../services/notification/notification.service';

import { IUser } from '../../interfaces/IUser';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})
export class HeaderComponent implements OnInit {
  currentUser: IUser = null;
  isLogged = false;

  constructor(
    private auth: AuthService,
    private alertService: NotificationService
  ) {
    console.log('Header init...');
  }

  ngOnInit() {
    console.log('Header init... again');
    this.isLogged = this.auth.isLogged();

    console.log(this);

    if (this.isLogged) {
      this.logout();
    }
    this.currentUser = this.auth.getCurrentUser();
  }

  success(message: string) {
    this.alertService.success(message);
  }

  error(message: string) {
    this.alertService.error(message);
  }

  info(message: string) {
    this.alertService.info(message);
  }

  warn(message: string) {
    this.alertService.warn(message);
  }

  clear() {
    this.alertService.clear();
  }

  public logout() {
    this.currentUser = null;
    this.auth.logout();
  }
}
