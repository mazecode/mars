import {
  NgModule,
  NO_ERRORS_SCHEMA,
  CUSTOM_ELEMENTS_SCHEMA
} from '@angular/core';
import { HttpClientModule, HTTP_INTERCEPTORS } from '@angular/common/http';
import { ReactiveFormsModule, FormsModule } from '@angular/forms';
import { BrowserModule } from '@angular/platform-browser';
import { RouterModule, Routes } from '@angular/router';

import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

import { LoggerModule, NgxLoggerLevel } from 'ngx-logger';

import { AppComponent } from './app.component';
import { HeaderComponent } from './components/header/header.component';
import { FooterComponent } from './components/footer/footer.component';
import { HomeComponent } from './components/home/home.component';
import { Page404Component } from './components/page404/page404.component';
import { NotificationComponent } from './components/notification/notification.component';
import { UsersComponent } from './components/users/users.component';
import { LoginComponent } from './components/login/login.component';
import { DiscountComponent } from './components/discount/discount/discount.component';
import { RateComponent } from './components/rate/rate.component';

import { ApiService } from './services/api/api.service';
import { UserService } from './services/user/user.service';
import { NotificationService } from './services/notification/notification.service';

import { AuthInterceptor } from './interceptors/auth';
import { CustomHttpInterceptor } from './interceptors/http';

import { AuthGuard } from './guards/auth.guard';
import { ErrorHandler } from './services/error/ErrorHandler';
import { MaterialModules } from './MaterialModules';

import { LayoutModule } from '@angular/cdk/layout';
import { DashboardcComponent } from './dashboardc/dashboardc.component';
import { MatGridListModule, MatCardModule, MatMenuModule, MatIconModule, MatButtonModule } from '@angular/material';

const routes: Routes = [
  { path: '', component: LoginComponent }, // Login page
  { path: 'home', component: HomeComponent, canActivate: [AuthGuard] }, // Front-page
  { path: 'dash', component: DashboardcComponent, canActivate: [AuthGuard] }, // Back-page
  { path: 'discount', component: DiscountComponent, canActivate: [AuthGuard] },
  { path: 'rate', component: RateComponent, canActivate: [AuthGuard] },
  { path: 'users/:id', component: UsersComponent, canActivate: [AuthGuard] },
  { path: '404', component: Page404Component },
  { path: '**', redirectTo: '404', pathMatch: 'full' }
];

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    FooterComponent,
    Page404Component,
    NotificationComponent,
    HomeComponent,
    UsersComponent,
    LoginComponent,
    DiscountComponent,
    RateComponent,
    DashboardcComponent
  ],
  imports: [
    BrowserModule,
    BrowserAnimationsModule,
    LayoutModule,
    HttpClientModule,
    ReactiveFormsModule,
    FormsModule,
    // Material Modules
    MaterialModules,
    RouterModule.forRoot(routes, { useHash: true }),
    LoggerModule.forRoot({
      // serverLoggingUrl: `${environment.api.endpoint}/logs`,
      level: NgxLoggerLevel.ERROR,
      serverLogLevel: NgxLoggerLevel.ERROR
    }),
    MatGridListModule,
    MatCardModule,
    MatMenuModule,
    MatIconModule,
    MatButtonModule
  ],
  exports: [MaterialModules],
  providers: [
    ErrorHandler,
    // Servicios
    ApiService,
    UserService,
    NotificationService,
    // Interceptores
    { provide: HTTP_INTERCEPTORS, useClass: AuthInterceptor, multi: true },
    {
      provide: HTTP_INTERCEPTORS,
      useClass: CustomHttpInterceptor,
      multi: true
    }
  ],
  bootstrap: [AppComponent],
  schemas: [NO_ERRORS_SCHEMA, CUSTOM_ELEMENTS_SCHEMA]
})
export class AppModule {}
