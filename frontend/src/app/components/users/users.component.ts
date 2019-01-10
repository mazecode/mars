import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

import { NGXLogger } from 'ngx-logger';

import { UserService } from '../../services/user/user.service';

@Component({
  selector: 'app-users',
  templateUrl: './users.component.html',
  styleUrls: ['./users.component.scss']
})
export class UsersComponent implements OnInit {
  user: any = {};

  constructor(
    private logger: NGXLogger,
    private sUser: UserService,
    private aRoute: ActivatedRoute
  ) {
    // this.logger.debug('Users init...');
    // this.aRoute.params.subscribe(params => {
    //   console.log(params['id']);
    //   this.get(params['id']);
    // });
  }

  ngOnInit() {}

  // async get(id: number) {
  //   this.sUser.get(id).subscribe(response => {
  //     this.logger.debug(response);
  //     try {
  //       this.logger.debug(response);
  //       this.user = response['data'];
  //     } catch (err) {
  //       this.logger.error(err);
  //     }
  //   });
  // }
}
