import { Component, OnInit } from '@angular/core';

import { UserService } from '../user-service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {

  users: any[] = [];

  constructor(private sUser: UserService) {

  }

  ngOnInit() {
    this.sUser.all().subscribe(response => this.users = response['data']);
  }
}
