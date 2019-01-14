import { Component, OnInit } from '@angular/core';

import { UserService } from '../../services/user/user.service';
import { JwtService } from '../../services/jwt/jwt.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss'],
  providers: [UserService]
})
export class HomeComponent implements OnInit {
  users: Array<object> = [];

  constructor(private service: UserService, private jwt: JwtService) {
    console.log('Home Component init...');
  }

  ngOnInit() {
    console.log('HOME: ' + this.jwt.getToken());
    this.service.all().subscribe(response => (this.users = response['data']));
  }
}
