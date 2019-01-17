import { Component, OnInit } from '@angular/core';

import { Router, ActivatedRoute } from '@angular/router';

import { JwtService } from '../../services/jwt/jwt.service';
import { AuthService } from '../../services/auth/auth.service';

export interface Tile {
  color: string;
  cols: number;
  rows: number;
  text: string;
}

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {
  username: string;
  password: string;
  showSpinner = false;

  tiles: Tile[] = [
    {text: 'One', cols: 3, rows: 1, color: 'lightblue'},
    {text: 'Two', cols: 1, rows: 2, color: 'lightgreen'},
    {text: 'Three', cols: 1, rows: 1, color: 'lightpink'},
    {text: 'Four', cols: 2, rows: 1, color: '#DDBDF1'},
  ];

  constructor(
    private service: AuthService,
    private jwt: JwtService,
    private router: Router,
    private route: ActivatedRoute
  ) {}

  ngOnInit() {
    const token = this.jwt.getToken();

    if (token) {
      this.goHome();
    }
  }

  public async login(username: string, password: string) {
    this.showSpinner = true;

    const pass = await this.service.login(username, password);

    setTimeout(() => {
      this.showSpinner = false;

      if (pass) {
        this.goHome();
      }
    }, 3000);
  }

  public logout() {
    this.service.logout();
    this.goHome();
  }

  public goHome() {
    this.router.navigate(['/home']);
    return true;
  }
}
