import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MondatairesComponent } from './mondataires.component';

describe('MondatairesComponent', () => {
  let component: MondatairesComponent;
  let fixture: ComponentFixture<MondatairesComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MondatairesComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MondatairesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
