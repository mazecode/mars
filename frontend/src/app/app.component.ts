import { Component, OnInit } from '@angular/core';
import { NGXLogger } from 'ngx-logger';
import { AuthService } from './services/auth/auth.service';
import { IUser } from './interfaces/IUser';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  currentUser: IUser;

  constructor(private logger: NGXLogger, private authS: AuthService) {
    this.logger.debug('APP init...');
    this.currentUser = this.authS.currentUser;
  }

  OnInit() {
    console.log('INITTTT');
  }

  public logout() {
    this.authS.logout();
  }
}
