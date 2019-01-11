import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class JwtService {
  constructor(private token: string) {
      this.token = token;
  }

  getToken(): string {
    this.token = window.localStorage['jwtToken'];

    return this.token;
  }

  saveToken(newToken: string) {
    window.localStorage['jwtToken'] = newToken;
    this.token = newToken;
  }

  destroyToken(): void {
    window.localStorage.removeItem('jwtToken');
  }
}
