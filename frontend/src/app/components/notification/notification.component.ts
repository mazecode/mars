import { Component, OnInit, Input } from '@angular/core';

import { NotificationService } from '../../services/notification/notification.service';
import { Notify, NotifyType } from '../../interfaces/Notify';

@Component({
  selector: 'app-notification',
  templateUrl: './notification.component.html',
  styleUrls: ['./notification.component.scss']
})
export class NotificationComponent implements OnInit {
  @Input() id: string;
  alerts: Notify[] = [];

  constructor(private service: NotificationService) {
    console.log('init notify comp');
  }

  ngOnInit() {
    console.log('init again....');

    this.service.getAlert(this.id).subscribe((alert: Notify) => {
      if (!alert.message) {
        // clear alerts when an empty alert is received
        this.alerts = [];
        return;
      }

      // add alert to array
      this.alerts.push(alert);
    });
  }

  removeAlert(alert: Notify) {
    this.alerts = this.alerts.filter(x => x !== alert);
  }

  cssClass(alert: Notify) {
    if (!alert) {
      return;
    }

    // return css class based on alert type
    switch (alert.type) {
      case NotifyType.Success:
        return 'alert alert-success';
      case NotifyType.Error:
        return 'alert alert-danger';
      case NotifyType.Info:
        return 'alert alert-info';
      case NotifyType.Warning:
        return 'alert alert-warning';
    }
  }
}
