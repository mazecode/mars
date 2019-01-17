import { Injectable } from '@angular/core';

import { NGXLogger } from 'ngx-logger';

import { throwError } from 'rxjs';

@Injectable()
export class ErrorHandler {
  constructor(private logger: NGXLogger) {}

  public handleError(error: any) {
    let errorMessage = '';
    if (error.error instanceof ErrorEvent) {
      // client-side error
      errorMessage = `Error: ${error.error.message}`;
    } else {
      // server-side error
      errorMessage = `Error Code: ${error.status}\nMessage: ${error.message}`;
    }

    this.logger.error(errorMessage);

    return throwError(errorMessage);
  }
}
