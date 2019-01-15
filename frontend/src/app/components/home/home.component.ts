import { Component, OnInit } from '@angular/core';

import { UserService } from '../../services/user/user.service';
import { JwtService } from '../../services/jwt/jwt.service';
import { IUser } from '../../interfaces/IUser';
import { Router } from '@angular/router';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss'],
  providers: [UserService]
})
export class HomeComponent implements OnInit {
  users: Array<IUser> = [];

  constructor(
    private service: UserService,
    private jwt: JwtService,
    private router: Router
  ) {}

  async ngOnInit() {
    const token = this.jwt.getToken();
    if (!token) {
      this.router.navigate(['/']);
      return true;
    }

    await this.getAllUsers();
  }

  public async getAllUsers() {
    const response = await this.service.all();
    this.users = response.data;
  }
}
