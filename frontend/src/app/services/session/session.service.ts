import { Injectable } from '@angular/core';
import { IUser } from '../../interfaces/IUser';

@Injectable({
  providedIn: 'root'
})
export class SessionService {
  currentUser: IUser = null;

  constructor() {}

  getCurrentUser(): IUser {
    return (this.currentUser = window.localStorage['currentUser']);
  }

  saveCurrentUser(currentUser: IUser): void {
    this.currentUser = currentUser;
    window.localStorage['currentUser'] = currentUser;
  }

  destroyCurrentUser(): void {
    this.currentUser = null;
    window.localStorage.removeItem('currentUser');
  }
}
