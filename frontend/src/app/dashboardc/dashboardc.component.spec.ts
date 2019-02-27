import { LayoutModule } from '@angular/cdk/layout';
import { NoopAnimationsModule } from '@angular/platform-browser/animations';
import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import {
  MatButtonModule,
  MatCardModule,
  MatGridListModule,
  MatIconModule,
  MatMenuModule,
} from '@angular/material';

import { DashboardcComponent } from './dashboardc.component';

describe('DashboardcComponent', () => {
  let component: DashboardcComponent;
  let fixture: ComponentFixture<DashboardcComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [DashboardcComponent],
      imports: [
        NoopAnimationsModule,
        LayoutModule,
        MatButtonModule,
        MatCardModule,
        MatGridListModule,
        MatIconModule,
        MatMenuModule,
      ]
    }).compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DashboardcComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should compile', () => {
    expect(component).toBeTruthy();
  });
});
