import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class JwtService {
  token: string;

  constructor(token?: string) {
    if (token) {
      this.token = token;
    }
  }

  getToken(): string {
    this.token = window.localStorage['jwtToken'];

    return this.token;
  }

  saveToken(token: string) {
    window.localStorage['jwtToken'] = token;
    this.token = token;
  }

  destroyToken(): void {
    window.localStorage.removeItem('jwtToken');
  }
}
