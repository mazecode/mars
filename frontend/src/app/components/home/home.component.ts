import { Component, OnInit } from '@angular/core';

import { UserService } from '../../services/user/user.service';
import { ApiService } from '../../services/api/api.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss'],
  providers: [ApiService, UserService]
})
export class HomeComponent implements OnInit {
  users: Array<object> = [];

  constructor(private service: UserService) {
    console.log('Home Component init...');
    console.log(service);
  }

  ngOnInit() {
    this.service.all().subscribe(response => (this.users = response['data']));
  }
}
