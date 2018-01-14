<?php
/**
 * Created by Marcin.
 * Date: 14.01.2018
 * Time: 17:31
 */

namespace mrcnpdlk\Api\ImageChart\Model;


class Type
{
    const TYPE_BVS = 'bvs'; // vertical bar chart stacked
    const TYPE_BHS = 'bhs'; // horizontal bar chart stacked
    const TYPE_BVG = 'bvg'; // vertical bar chart grouped
    const TYPE_BHG = 'bhg'; // horizontal bar chart grouped
    const TYPE_BVO = 'bvs'; // vertical bar chart stacked. This type of chart is not planned to be supported and will automatically falls back to the bvs type
    const TYPE_P   = 'p'; // pie
    const TYPE_P3  = 'p3'; // pie 3D
    const TYPE_PC  = 'pc'; // concentric pie chart
    const TYPE_PD  = 'pd'; // doughnut pie chart
    const TYPE_LS  = 'ls'; // line chart, by default does not display axis lines
    const TYPE_LC  = 'lc'; // line chart, Axis lines are shown by default
    const TYPE_LXY = 'lxy'; // Lets you specify both x- and y-coordinates for each point, rather just the y values

}
