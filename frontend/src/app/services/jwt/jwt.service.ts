import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class JwtService {
  token = '';

  constructor() {}

  getToken(): string {
    return this.token = window.localStorage['jwtToken'];
  }

  saveToken(token: string): void {
    this.token = token;
    window.localStorage['jwtToken'] = token;
  }

  destroyToken(): void {
    this.token = null;
    window.localStorage.removeItem('jwtToken');
  }
}
