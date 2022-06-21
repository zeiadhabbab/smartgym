import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { ApexChartsComponent } from './apex-charts/apex-charts.component';
import { ChartjsComponent } from './chartjs/chartjs.component';
import { ChartlistComponent } from './chartlist/chartlist.component';
import { EChartsComponent } from './echarts/echarts.component';

const routes: Routes = [
  {
    path: '',
    children: [
      {
        path: 'apex-charts',
        component: ApexChartsComponent
      },
      {
        path: 'e-charts',
        component: EChartsComponent
      },
      {
        path: 'chart-js',
        component: ChartjsComponent
      },
      {
        path: 'chart-list',
        component: ChartlistComponent
      }
    ]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class ChartsRoutingModule { }
