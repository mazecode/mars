import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

import { UserService } from '../user-service';

@Component({
  selector: 'app-users',
  templateUrl: './users.component.html',
  styleUrls: ['./users.component.scss']
})
export class UsersComponent implements OnInit {

  user: any = {};

  constructor(private sUser: UserService, private aRoute: ActivatedRoute) {
    this.aRoute.params.subscribe(params => {
      console.log(params['id'])
      this.get(params['id'])
    })
  }

  ngOnInit() {
  }

  async get(id: number) {
    this.sUser.get(id).subscribe(response => this.user = response['data']);
  }

}
