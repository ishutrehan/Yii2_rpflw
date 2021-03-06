/*
 Highmaps JS v5.0.6 (2016-12-07)
 Highmaps as a plugin for Highcharts 4.1.x or Highstock 2.1.x (x being the patch version of this file)

 (c) 2011-2016 Torstein Honsi

 License: www.highcharts.com/license
*/
(function(x){"object"===typeof module&&module.exports?module.exports=x:x(Highcharts)})(function(x){(function(a){var h=a.Axis,m=a.each,g=a.pick;a=a.wrap;a(h.prototype,"getSeriesExtremes",function(a){var e=this.isXAxis,r,u,p=[],c;e&&m(this.series,function(b,a){b.useMapGeometry&&(p[a]=b.xData,b.xData=[])});a.call(this);e&&(r=g(this.dataMin,Number.MAX_VALUE),u=g(this.dataMax,-Number.MAX_VALUE),m(this.series,function(b,a){b.useMapGeometry&&(r=Math.min(r,g(b.minX,r)),u=Math.max(u,g(b.maxX,r)),b.xData=p[a],
c=!0)}),c&&(this.dataMin=r,this.dataMax=u))});a(h.prototype,"setAxisTranslation",function(a){var n=this.chart,e=n.plotWidth/n.plotHeight,n=n.xAxis[0],g;a.call(this);"yAxis"===this.coll&&void 0!==n.transA&&m(this.series,function(a){a.preserveAspectRatio&&(g=!0)});if(g&&(this.transA=n.transA=Math.min(this.transA,n.transA),a=e/((n.max-n.min)/(this.max-this.min)),a=1>a?this:n,e=(a.max-a.min)*a.transA,a.pixelPadding=a.len-e,a.minPixelPadding=a.pixelPadding/2,e=a.fixTo)){e=e[1]-a.toValue(e[0],!0);e*=a.transA;
if(Math.abs(e)>a.minPixelPadding||a.min===a.dataMin&&a.max===a.dataMax)e=0;a.minPixelPadding-=e}});a(h.prototype,"render",function(a){a.call(this);this.fixTo=null})})(x);(function(a){var h=a.Axis,m=a.Chart,g=a.color,e,n=a.each,r=a.extend,u=a.isNumber,p=a.Legend,c=a.LegendSymbolMixin,b=a.noop,f=a.merge,k=a.pick,t=a.wrap;e=a.ColorAxis=function(){this.init.apply(this,arguments)};r(e.prototype,h.prototype);r(e.prototype,{defaultColorAxisOptions:{lineWidth:0,minPadding:0,maxPadding:0,gridLineWidth:1,tickPixelInterval:72,
startOnTick:!0,endOnTick:!0,offset:0,marker:{animation:{duration:50},width:.01},labels:{overflow:"justify"},minColor:"#e6ebf5",maxColor:"#003399",tickLength:5,showInLegend:!0},keepProps:["legendGroup","legendItem","legendSymbol"].concat(h.prototype.keepProps),init:function(a,q){var d="vertical"!==a.options.legend.layout,b;this.coll="colorAxis";b=f(this.defaultColorAxisOptions,{side:d?2:1,reversed:!d},q,{opposite:!d,showEmpty:!1,title:null});h.prototype.init.call(this,a,b);q.dataClasses&&this.initDataClasses(q);
this.initStops(q);this.horiz=d;this.zoomEnabled=!1;this.defaultLegendLength=200},tweenColors:function(a,b,d){var l;b.rgba.length&&a.rgba.length?(a=a.rgba,b=b.rgba,l=1!==b[3]||1!==a[3],a=(l?"rgba(":"rgb(")+Math.round(b[0]+(a[0]-b[0])*(1-d))+","+Math.round(b[1]+(a[1]-b[1])*(1-d))+","+Math.round(b[2]+(a[2]-b[2])*(1-d))+(l?","+(b[3]+(a[3]-b[3])*(1-d)):"")+")"):a=b.input||"none";return a},initDataClasses:function(a){var b=this,d,l=0,c=this.chart.options.chart.colorCount,k=this.options,e=a.dataClasses.length;
this.dataClasses=d=[];this.legendItems=[];n(a.dataClasses,function(a,q){a=f(a);d.push(a);a.color||("category"===k.dataClassColor?(a.colorIndex=l,l++,l===c&&(l=0)):a.color=b.tweenColors(g(k.minColor),g(k.maxColor),2>e?.5:q/(e-1)))})},initStops:function(a){this.stops=a.stops||[[0,this.options.minColor],[1,this.options.maxColor]];n(this.stops,function(a){a.color=g(a[1])})},setOptions:function(a){h.prototype.setOptions.call(this,a);this.options.crosshair=this.options.marker},setAxisSize:function(){var a=
this.legendSymbol,b=this.chart,d=b.options.legend||{},f,c;a?(this.left=d=a.attr("x"),this.top=f=a.attr("y"),this.width=c=a.attr("width"),this.height=a=a.attr("height"),this.right=b.chartWidth-d-c,this.bottom=b.chartHeight-f-a,this.len=this.horiz?c:a,this.pos=this.horiz?d:f):this.len=(this.horiz?d.symbolWidth:d.symbolHeight)||this.defaultLegendLength},toColor:function(a,b){var d=this.stops,f,c,q=this.dataClasses,l,k;if(q)for(k=q.length;k--;){if(l=q[k],f=l.from,d=l.to,(void 0===f||a>=f)&&(void 0===
d||a<=d)){c=l.color;b&&(b.dataClass=k,b.colorIndex=l.colorIndex);break}}else{this.isLog&&(a=this.val2lin(a));a=1-(this.max-a)/(this.max-this.min||1);for(k=d.length;k--&&!(a>d[k][0]););f=d[k]||d[k+1];d=d[k+1]||f;a=1-(d[0]-a)/(d[0]-f[0]||1);c=this.tweenColors(f.color,d.color,a)}return c},getOffset:function(){var a=this.legendGroup,b=this.chart.axisOffset[this.side];a&&(this.axisParent=a,h.prototype.getOffset.call(this),this.added||(this.added=!0,this.labelLeft=0,this.labelRight=this.width),this.chart.axisOffset[this.side]=
b)},setLegendColor:function(){var a,b=this.options,d=this.reversed;a=d?1:0;d=d?0:1;a=this.horiz?[a,0,d,0]:[0,d,0,a];this.legendColor={linearGradient:{x1:a[0],y1:a[1],x2:a[2],y2:a[3]},stops:b.stops||[[0,b.minColor],[1,b.maxColor]]}},drawLegendSymbol:function(a,b){var d=a.padding,f=a.options,c=this.horiz,q=k(f.symbolWidth,c?this.defaultLegendLength:12),l=k(f.symbolHeight,c?12:this.defaultLegendLength),e=k(f.labelPadding,c?16:30),f=k(f.itemDistance,10);this.setLegendColor();b.legendSymbol=this.chart.renderer.rect(0,
a.baseline-11,q,l).attr({zIndex:1}).add(b.legendGroup);this.legendItemWidth=q+d+(c?f:e);this.legendItemHeight=l+d+(c?e:0)},setState:b,visible:!0,setVisible:b,getSeriesExtremes:function(){var a;this.series.length&&(a=this.series[0],this.dataMin=a.valueMin,this.dataMax=a.valueMax)},drawCrosshair:function(a,b){var d=b&&b.plotX,f=b&&b.plotY,c,k=this.pos,q=this.len;b&&(c=this.toPixels(b[b.series.colorKey]),c<k?c=k-2:c>k+q&&(c=k+q+2),b.plotX=c,b.plotY=this.len-c,h.prototype.drawCrosshair.call(this,a,b),
b.plotX=d,b.plotY=f,this.cross&&this.cross.addClass("highcharts-coloraxis-marker").add(this.legendGroup))},getPlotLinePath:function(a,b,d,f,c){return u(c)?this.horiz?["M",c-4,this.top-6,"L",c+4,this.top-6,c,this.top,"Z"]:["M",this.left,c,"L",this.left-6,c+6,this.left-6,c-6,"Z"]:h.prototype.getPlotLinePath.call(this,a,b,d,f)},update:function(a,b){var d=this.chart,c=d.legend;n(this.series,function(a){a.isDirtyData=!0});a.dataClasses&&c.allItems&&(n(c.allItems,function(a){a.isDataClass&&a.legendGroup.destroy()}),
d.isDirtyLegend=!0);d.options[this.coll]=f(this.userOptions,a);h.prototype.update.call(this,a,b);this.legendItem&&(this.setLegendColor(),c.colorizeItem(this,!0))},getDataClassLegendSymbols:function(){var f=this,k=this.chart,d=this.legendItems,e=k.options.legend,t=e.valueDecimals,g=e.valueSuffix||"",m;d.length||n(this.dataClasses,function(q,e){var l=!0,w=q.from,v=q.to;m="";void 0===w?m="\x3c ":void 0===v&&(m="\x3e ");void 0!==w&&(m+=a.numberFormat(w,t)+g);void 0!==w&&void 0!==v&&(m+=" - ");void 0!==
v&&(m+=a.numberFormat(v,t)+g);d.push(r({chart:k,name:m,options:{},drawLegendSymbol:c.drawRectangle,visible:!0,setState:b,isDataClass:!0,setVisible:function(){l=this.visible=!l;n(f.series,function(a){n(a.points,function(a){a.dataClass===e&&a.setVisible(l)})});k.legend.colorizeItem(this,l)}},q))});return d},name:""});n(["fill","stroke"],function(b){a.Fx.prototype[b+"Setter"]=function(){this.elem.attr(b,e.prototype.tweenColors(g(this.start),g(this.end),this.pos),null,!0)}});t(m.prototype,"getAxes",function(a){var b=
this.options.colorAxis;a.call(this);this.colorAxis=[];b&&new e(this,b)});t(p.prototype,"getAllItems",function(a){var b=[],d=this.chart.colorAxis[0];d&&d.options&&(d.options.showInLegend&&(d.options.dataClasses?b=b.concat(d.getDataClassLegendSymbols()):b.push(d)),n(d.series,function(a){a.options.showInLegend=!1}));return b.concat(a.call(this))});t(p.prototype,"colorizeItem",function(a,b,d){a.call(this,b,d);d&&b.legendColor&&b.legendSymbol.attr({fill:b.legendColor})})})(x);(function(a){var h=a.defined,
m=a.each,g=a.noop;a.colorPointMixin={isValid:function(){return null!==this.value},setVisible:function(a){var e=this,g=a?"show":"hide";m(["graphic","dataLabel"],function(a){if(e[a])e[a][g]()})},setState:function(e){a.Point.prototype.setState.call(this,e);this.graphic&&this.graphic.attr({zIndex:"hover"===e?1:0})}};a.colorSeriesMixin={pointArrayMap:["value"],axisTypes:["xAxis","yAxis","colorAxis"],optionalAxis:"colorAxis",trackerGroups:["group","markerGroup","dataLabelsGroup"],getSymbol:g,parallelArrays:["x",
"y","value"],colorKey:"value",translateColors:function(){var a=this,n=this.options.nullColor,g=this.colorAxis,h=this.colorKey;m(this.data,function(e){var c=e[h];if(c=e.options.color||(e.isNull?n:g&&void 0!==c?g.toColor(c,e):e.color||a.color))e.color=c})},colorAttribs:function(a){var e={};h(a.color)&&(e[this.colorProp||"fill"]=a.color);return e}}})(x);(function(a){function h(a){a&&(a.preventDefault&&a.preventDefault(),a.stopPropagation&&a.stopPropagation(),a.cancelBubble=!0)}var m=a.addEvent,g=a.Chart,
e=a.doc,n=a.each,r=a.extend,u=a.merge,p=a.pick;a=a.wrap;r(g.prototype,{renderMapNavigation:function(){var a=this,b=this.options.mapNavigation,f=b.buttons,k,e,l,q=function(b){this.handler.call(a,b);h(b)};if(p(b.enableButtons,b.enabled)&&!a.renderer.forExport)for(k in a.mapNavButtons=[],f)f.hasOwnProperty(k)&&(l=u(b.buttonOptions,f[k]),e=a.renderer.button(l.text,0,0,q,void 0,void 0,void 0,0,"zoomIn"===k?"topbutton":"bottombutton").addClass("highcharts-map-navigation").attr({width:l.width,height:l.height,
title:a.options.lang[k],padding:l.padding,zIndex:5}).add(),e.handler=l.onclick,e.align(r(l,{width:e.width,height:2*e.height}),null,l.alignTo),m(e.element,"dblclick",h),a.mapNavButtons.push(e))},fitToBox:function(a,b){n([["x","width"],["y","height"]],function(f){var c=f[0];f=f[1];a[c]+a[f]>b[c]+b[f]&&(a[f]>b[f]?(a[f]=b[f],a[c]=b[c]):a[c]=b[c]+b[f]-a[f]);a[f]>b[f]&&(a[f]=b[f]);a[c]<b[c]&&(a[c]=b[c])});return a},mapZoom:function(a,b,f,e,n){var c=this.xAxis[0],k=c.max-c.min,d=p(b,c.min+k/2),w=k*a,k=this.yAxis[0],
v=k.max-k.min,g=p(f,k.min+v/2),v=v*a,d=this.fitToBox({x:d-w*(e?(e-c.pos)/c.len:.5),y:g-v*(n?(n-k.pos)/k.len:.5),width:w,height:v},{x:c.dataMin,y:k.dataMin,width:c.dataMax-c.dataMin,height:k.dataMax-k.dataMin}),w=d.x<=c.dataMin&&d.width>=c.dataMax-c.dataMin&&d.y<=k.dataMin&&d.height>=k.dataMax-k.dataMin;e&&(c.fixTo=[e-c.pos,b]);n&&(k.fixTo=[n-k.pos,f]);void 0===a||w?(c.setExtremes(void 0,void 0,!1),k.setExtremes(void 0,void 0,!1)):(c.setExtremes(d.x,d.x+d.width,!1),k.setExtremes(d.y,d.y+d.height,!1));
this.redraw()}});a(g.prototype,"render",function(a){var b=this,c=b.options.mapNavigation;b.renderMapNavigation();a.call(b);(p(c.enableDoubleClickZoom,c.enabled)||c.enableDoubleClickZoomTo)&&m(b.container,"dblclick",function(a){b.pointer.onContainerDblClick(a)});p(c.enableMouseWheelZoom,c.enabled)&&m(b.container,void 0===e.onmousewheel?"DOMMouseScroll":"mousewheel",function(a){b.pointer.onContainerMouseWheel(a);h(a);return!1})})})(x);(function(a){var h=a.extend,m=a.pick,g=a.Pointer;a=a.wrap;h(g.prototype,
{onContainerDblClick:function(a){var e=this.chart;a=this.normalize(a);e.options.mapNavigation.enableDoubleClickZoomTo?e.pointer.inClass(a.target,"highcharts-tracker")&&e.hoverPoint&&e.hoverPoint.zoomTo():e.isInsidePlot(a.chartX-e.plotLeft,a.chartY-e.plotTop)&&e.mapZoom(.5,e.xAxis[0].toValue(a.chartX),e.yAxis[0].toValue(a.chartY),a.chartX,a.chartY)},onContainerMouseWheel:function(a){var e=this.chart,g;a=this.normalize(a);g=a.detail||-(a.wheelDelta/120);e.isInsidePlot(a.chartX-e.plotLeft,a.chartY-e.plotTop)&&
e.mapZoom(Math.pow(e.options.mapNavigation.mouseWheelSensitivity,g),e.xAxis[0].toValue(a.chartX),e.yAxis[0].toValue(a.chartY),a.chartX,a.chartY)}});a(g.prototype,"zoomOption",function(a){var e=this.chart.options.mapNavigation;m(e.enableTouchZoom,e.enabled)&&(this.chart.options.chart.pinchType="xy");a.apply(this,[].slice.call(arguments,1))});a(g.prototype,"pinchTranslate",function(a,g,m,h,p,c,b){a.call(this,g,m,h,p,c,b);"map"===this.chart.options.chart.type&&this.hasZoom&&(a=h.scaleX>h.scaleY,this.pinchTranslateDirection(!a,
g,m,h,p,c,b,a?h.scaleX:h.scaleY))})})(x);(function(a){var h=a.colorPointMixin,m=a.each,g=a.extend,e=a.isNumber,n=a.map,r=a.merge,u=a.noop,p=a.pick,c=a.isArray,b=a.Point,f=a.Series,k=a.seriesType,t=a.seriesTypes,l=a.splat,q=void 0!==a.doc.documentElement.style.vectorEffect;k("map","scatter",{allAreas:!0,animation:!1,nullColor:"#f7f7f7",borderColor:"#cccccc",borderWidth:1,marker:null,stickyTracking:!1,joinBy:"hc-key",dataLabels:{formatter:function(){return this.point.value},inside:!0,verticalAlign:"middle",
crop:!1,overflow:!1,padding:0},turboThreshold:0,tooltip:{followPointer:!0,pointFormat:"{point.name}: {point.value}\x3cbr/\x3e"},states:{normal:{animation:!0},hover:{brightness:.2,halo:null},select:{color:"#cccccc"}}},r(a.colorSeriesMixin,{type:"map",supportsDrilldown:!0,getExtremesFromAll:!0,useMapGeometry:!0,forceDL:!0,searchPoint:u,directTouch:!0,preserveAspectRatio:!0,pointArrayMap:["value"],getBox:function(b){var d=Number.MAX_VALUE,c=-d,f=d,k=-d,l=d,q=d,g=this.xAxis,t=this.yAxis,h;m(b||[],function(b){if(b.path){"string"===
typeof b.path&&(b.path=a.splitPath(b.path));var g=b.path||[],w=g.length,v=!1,t=-d,m=d,n=-d,A=d,r=b.properties;if(!b._foundBox){for(;w--;)e(g[w])&&(v?(t=Math.max(t,g[w]),m=Math.min(m,g[w])):(n=Math.max(n,g[w]),A=Math.min(A,g[w])),v=!v);b._midX=m+(t-m)*(b.middleX||r&&r["hc-middle-x"]||.5);b._midY=A+(n-A)*(b.middleY||r&&r["hc-middle-y"]||.5);b._maxX=t;b._minX=m;b._maxY=n;b._minY=A;b.labelrank=p(b.labelrank,(t-m)*(n-A));b._foundBox=!0}c=Math.max(c,b._maxX);f=Math.min(f,b._minX);k=Math.max(k,b._maxY);
l=Math.min(l,b._minY);q=Math.min(b._maxX-b._minX,b._maxY-b._minY,q);h=!0}});h&&(this.minY=Math.min(l,p(this.minY,d)),this.maxY=Math.max(k,p(this.maxY,-d)),this.minX=Math.min(f,p(this.minX,d)),this.maxX=Math.max(c,p(this.maxX,-d)),g&&void 0===g.options.minRange&&(g.minRange=Math.min(5*q,(this.maxX-this.minX)/5,g.minRange||d)),t&&void 0===t.options.minRange&&(t.minRange=Math.min(5*q,(this.maxY-this.minY)/5,t.minRange||d)))},getExtremes:function(){f.prototype.getExtremes.call(this,this.valueData);this.chart.hasRendered&&
this.isDirtyData&&this.getBox(this.options.data);this.valueMin=this.dataMin;this.valueMax=this.dataMax;this.dataMin=this.minY;this.dataMax=this.maxY},translatePath:function(a){var b=!1,d=this.xAxis,c=this.yAxis,f=d.min,k=d.transA,d=d.minPixelPadding,g=c.min,q=c.transA,c=c.minPixelPadding,l,t=[];if(a)for(l=a.length;l--;)e(a[l])?(t[l]=b?(a[l]-f)*k+d:(a[l]-g)*q+c,b=!b):t[l]=a[l];return t},setData:function(b,k,g,q){var d=this.options,w=this.chart.options.chart,t=w&&w.map,v=d.mapData,h=d.joinBy,p=null===
h,u=d.keys||this.pointArrayMap,x=[],B={},y,z=this.chart.mapTransforms;!v&&t&&(v="string"===typeof t?a.maps[t]:t);p&&(h="_i");h=this.joinBy=l(h);h[1]||(h[1]=h[0]);b&&m(b,function(a,f){var k=0;if(e(a))b[f]={value:a};else if(c(a)){b[f]={};!d.keys&&a.length>u.length&&"string"===typeof a[0]&&(b[f]["hc-key"]=a[0],++k);for(var l=0;l<u.length;++l,++k)u[l]&&(b[f][u[l]]=a[k])}p&&(b[f]._i=f)});this.getBox(b);if(this.chart.mapTransforms=z=w&&w.mapTransforms||v&&v["hc-transform"]||z)for(y in z)z.hasOwnProperty(y)&&
y.rotation&&(y.cosAngle=Math.cos(y.rotation),y.sinAngle=Math.sin(y.rotation));if(v){"FeatureCollection"===v.type&&(this.mapTitle=v.title,v=a.geojson(v,this.type,this));this.mapData=v;this.mapMap={};for(y=0;y<v.length;y++)w=v[y],t=w.properties,w._i=y,h[0]&&t&&t[h[0]]&&(w[h[0]]=t[h[0]]),B[w[h[0]]]=w;this.mapMap=B;b&&h[1]&&m(b,function(a){B[a[h[1]]]&&x.push(B[a[h[1]]])});d.allAreas?(this.getBox(v),b=b||[],h[1]&&m(b,function(a){x.push(a[h[1]])}),x="|"+n(x,function(a){return a&&a[h[0]]}).join("|")+"|",
m(v,function(a){h[0]&&-1!==x.indexOf("|"+a[h[0]]+"|")||(b.push(r(a,{value:null})),q=!1)})):this.getBox(x)}f.prototype.setData.call(this,b,k,g,q)},drawGraph:u,drawDataLabels:u,doFullTranslate:function(){return this.isDirtyData||this.chart.isResizing||this.chart.renderer.isVML||!this.baseTrans},translate:function(){var a=this,b=a.xAxis,c=a.yAxis,f=a.doFullTranslate();a.generatePoints();m(a.data,function(d){d.plotX=b.toPixels(d._midX,!0);d.plotY=c.toPixels(d._midY,!0);f&&(d.shapeType="path",d.shapeArgs=
{d:a.translatePath(d.path)})});a.translateColors()},pointAttribs:function(a,b){b=this.colorAttribs(a);a.isFading&&delete b.fill;q?b["vector-effect"]="non-scaling-stroke":b["stroke-width"]="inherit";return b},drawPoints:function(){var a=this,b=a.xAxis,c=a.yAxis,f=a.group,k=a.chart,e=k.renderer,l,g,h,n,r=this.baseTrans,p,u,x,z,C;a.transformGroup||(a.transformGroup=e.g().attr({scaleX:1,scaleY:1}).add(f),a.transformGroup.survive=!0);a.doFullTranslate()?(a.group=a.transformGroup,t.column.prototype.drawPoints.apply(a),
a.group=f,m(a.points,function(b){b.graphic&&(b.name&&b.graphic.addClass("highcharts-name-"+b.name.replace(/ /g,"-").toLowerCase()),b.properties&&b.properties["hc-key"]&&b.graphic.addClass("highcharts-key-"+b.properties["hc-key"].toLowerCase()),b.graphic.css(a.pointAttribs(b,b.selected&&"select")))}),this.baseTrans={originX:b.min-b.minPixelPadding/b.transA,originY:c.min-c.minPixelPadding/c.transA+(c.reversed?0:c.len/c.transA),transAX:b.transA,transAY:c.transA},this.transformGroup.animate({translateX:0,
translateY:0,scaleX:1,scaleY:1})):(l=b.transA/r.transAX,g=c.transA/r.transAY,h=b.toPixels(r.originX,!0),n=c.toPixels(r.originY,!0),.99<l&&1.01>l&&.99<g&&1.01>g&&(g=l=1,h=Math.round(h),n=Math.round(n)),p=this.transformGroup,k.renderer.globalAnimation?(u=p.attr("translateX"),x=p.attr("translateY"),z=p.attr("scaleX"),C=p.attr("scaleY"),p.attr({animator:0}).animate({animator:1},{step:function(a,b){p.attr({translateX:u+(h-u)*b.pos,translateY:x+(n-x)*b.pos,scaleX:z+(l-z)*b.pos,scaleY:C+(g-C)*b.pos})}})):
p.attr({translateX:h,translateY:n,scaleX:l,scaleY:g}));q||a.group.element.setAttribute("stroke-width",a.options[a.pointAttrToOptions&&a.pointAttrToOptions["stroke-width"]||"borderWidth"]/(l||1));this.drawMapDataLabels()},drawMapDataLabels:function(){f.prototype.drawDataLabels.call(this);this.dataLabelsGroup&&this.dataLabelsGroup.clip(this.chart.clipRect)},render:function(){var a=this,b=f.prototype.render;a.chart.renderer.isVML&&3E3<a.data.length?setTimeout(function(){b.call(a)}):b.call(a)},animate:function(a){var b=
this.options.animation,d=this.group,c=this.xAxis,f=this.yAxis,k=c.pos,e=f.pos;this.chart.renderer.isSVG&&(!0===b&&(b={duration:1E3}),a?d.attr({translateX:k+c.len/2,translateY:e+f.len/2,scaleX:.001,scaleY:.001}):(d.animate({translateX:k,translateY:e,scaleX:1,scaleY:1},b),this.animate=null))},animateDrilldown:function(a){var b=this.chart.plotBox,c=this.chart.drilldownLevels[this.chart.drilldownLevels.length-1],d=c.bBox,f=this.chart.options.drilldown.animation;a||(a=Math.min(d.width/b.width,d.height/
b.height),c.shapeArgs={scaleX:a,scaleY:a,translateX:d.x,translateY:d.y},m(this.points,function(a){a.graphic&&a.graphic.attr(c.shapeArgs).animate({scaleX:1,scaleY:1,translateX:0,translateY:0},f)}),this.animate=null)},drawLegendSymbol:a.LegendSymbolMixin.drawRectangle,animateDrillupFrom:function(a){t.column.prototype.animateDrillupFrom.call(this,a)},animateDrillupTo:function(a){t.column.prototype.animateDrillupTo.call(this,a)}}),g({applyOptions:function(a,c){a=b.prototype.applyOptions.call(this,a,c);
c=this.series;var d=c.joinBy;c.mapData&&((d=void 0!==a[d[1]]&&c.mapMap[a[d[1]]])?(c.xyFromShape&&(a.x=d._midX,a.y=d._midY),g(a,d)):a.value=a.value||null);return a},onMouseOver:function(a){clearTimeout(this.colorInterval);if(null!==this.value)b.prototype.onMouseOver.call(this,a);else this.series.onMouseOut(a)},zoomTo:function(){var a=this.series;a.xAxis.setExtremes(this._minX,this._maxX,!1);a.yAxis.setExtremes(this._minY,this._maxY,!1);a.chart.redraw()}},h))})(x);(function(a){var h=a.seriesType;h("mapline",
"map",{},{type:"mapline",colorProp:"stroke",drawLegendSymbol:a.seriesTypes.line.prototype.drawLegendSymbol})})(x);(function(a){var h=a.merge,m=a.Point;a=a.seriesType;a("mappoint","scatter",{dataLabels:{enabled:!0,formatter:function(){return this.point.name},crop:!1,defer:!1,overflow:!1,style:{color:"#000000"}}},{type:"mappoint",forceDL:!0},{applyOptions:function(a,e){a=void 0!==a.lat&&void 0!==a.lon?h(a,this.series.chart.fromLatLonToPoint(a)):a;return m.prototype.applyOptions.call(this,a,e)}})})(x);
(function(a){var h=a.merge,m=a.Point,g=a.seriesType,e=a.seriesTypes;e.bubble&&g("mapbubble","bubble",{animationLimit:500,tooltip:{pointFormat:"{point.name}: {point.z}"}},{xyFromShape:!0,type:"mapbubble",pointArrayMap:["z"],getMapData:e.map.prototype.getMapData,getBox:e.map.prototype.getBox,setData:e.map.prototype.setData},{applyOptions:function(a,g){return a&&void 0!==a.lat&&void 0!==a.lon?m.prototype.applyOptions.call(this,h(a,this.series.chart.fromLatLonToPoint(a)),g):e.map.prototype.pointClass.prototype.applyOptions.call(this,
a,g)},ttBelow:!1})})(x);(function(a){var h=a.colorPointMixin,m=a.each,g=a.merge,e=a.noop,n=a.pick,r=a.Series,u=a.seriesType,p=a.seriesTypes;u("heatmap","scatter",{animation:!1,borderWidth:0,dataLabels:{formatter:function(){return this.point.value},inside:!0,verticalAlign:"middle",crop:!1,overflow:!1,padding:0},marker:null,pointRange:null,tooltip:{pointFormat:"{point.x}, {point.y}: {point.value}\x3cbr/\x3e"},states:{normal:{animation:!0},hover:{halo:!1,brightness:.2}}},g(a.colorSeriesMixin,{pointArrayMap:["y",
"value"],hasPointSpecificOptions:!0,supportsDrilldown:!0,getExtremesFromAll:!0,directTouch:!0,init:function(){var a;p.scatter.prototype.init.apply(this,arguments);a=this.options;a.pointRange=n(a.pointRange,a.colsize||1);this.yAxis.axisPointRange=a.rowsize||1},translate:function(){var a=this.options,b=this.xAxis,f=this.yAxis,k=function(a,b,c){return Math.min(Math.max(b,a),c)};this.generatePoints();m(this.points,function(c){var e=(a.colsize||1)/2,g=(a.rowsize||1)/2,d=k(Math.round(b.len-b.translate(c.x-
e,0,1,0,1)),-b.len,2*b.len),e=k(Math.round(b.len-b.translate(c.x+e,0,1,0,1)),-b.len,2*b.len),h=k(Math.round(f.translate(c.y-g,0,1,0,1)),-f.len,2*f.len),g=k(Math.round(f.translate(c.y+g,0,1,0,1)),-f.len,2*f.len);c.plotX=c.clientX=(d+e)/2;c.plotY=(h+g)/2;c.shapeType="rect";c.shapeArgs={x:Math.min(d,e),y:Math.min(h,g),width:Math.abs(e-d),height:Math.abs(g-h)}});this.translateColors()},drawPoints:function(){p.column.prototype.drawPoints.call(this);m(this.points,function(a){a.graphic.css(this.colorAttribs(a))},
this)},animate:e,getBox:e,drawLegendSymbol:a.LegendSymbolMixin.drawRectangle,alignDataLabel:p.column.prototype.alignDataLabel,getExtremes:function(){r.prototype.getExtremes.call(this,this.valueData);this.valueMin=this.dataMin;this.valueMax=this.dataMax;r.prototype.getExtremes.call(this)}}),h)})(x);(function(a){function h(a,b){var c,k,e,g=!1,h=a.x,d=a.y;a=0;for(c=b.length-1;a<b.length;c=a++)k=b[a][1]>d,e=b[c][1]>d,k!==e&&h<(b[c][0]-b[a][0])*(d-b[a][1])/(b[c][1]-b[a][1])+b[a][0]&&(g=!g);return g}var m=
a.Chart,g=a.each,e=a.extend,n=a.format,r=a.merge,u=a.win,p=a.wrap;m.prototype.transformFromLatLon=function(c,b){if(void 0===u.proj4)return a.error(21),{x:0,y:null};c=u.proj4(b.crs,[c.lon,c.lat]);var f=b.cosAngle||b.rotation&&Math.cos(b.rotation),k=b.sinAngle||b.rotation&&Math.sin(b.rotation);c=b.rotation?[c[0]*f+c[1]*k,-c[0]*k+c[1]*f]:c;return{x:((c[0]-(b.xoffset||0))*(b.scale||1)+(b.xpan||0))*(b.jsonres||1)+(b.jsonmarginX||0),y:(((b.yoffset||0)-c[1])*(b.scale||1)+(b.ypan||0))*(b.jsonres||1)-(b.jsonmarginY||
0)}};m.prototype.transformToLatLon=function(c,b){if(void 0===u.proj4)a.error(21);else{c={x:((c.x-(b.jsonmarginX||0))/(b.jsonres||1)-(b.xpan||0))/(b.scale||1)+(b.xoffset||0),y:((-c.y-(b.jsonmarginY||0))/(b.jsonres||1)+(b.ypan||0))/(b.scale||1)+(b.yoffset||0)};var f=b.cosAngle||b.rotation&&Math.cos(b.rotation),k=b.sinAngle||b.rotation&&Math.sin(b.rotation);b=u.proj4(b.crs,"WGS84",b.rotation?{x:c.x*f+c.y*-k,y:c.x*k+c.y*f}:c);return{lat:b.y,lon:b.x}}};m.prototype.fromPointToLatLon=function(c){var b=this.mapTransforms,
f;if(b){for(f in b)if(b.hasOwnProperty(f)&&b[f].hitZone&&h({x:c.x,y:-c.y},b[f].hitZone.coordinates[0]))return this.transformToLatLon(c,b[f]);return this.transformToLatLon(c,b["default"])}a.error(22)};m.prototype.fromLatLonToPoint=function(c){var b=this.mapTransforms,f,k;if(!b)return a.error(22),{x:0,y:null};for(f in b)if(b.hasOwnProperty(f)&&b[f].hitZone&&(k=this.transformFromLatLon(c,b[f]),h({x:k.x,y:-k.y},b[f].hitZone.coordinates[0])))return k;return this.transformFromLatLon(c,b["default"])};a.geojson=
function(a,b,f){var c=[],h=[],l=function(a){var b,c=a.length;h.push("M");for(b=0;b<c;b++)1===b&&h.push("L"),h.push(a[b][0],-a[b][1])};b=b||"map";g(a.features,function(a){var d=a.geometry,f=d.type,d=d.coordinates;a=a.properties;var k;h=[];"map"===b||"mapbubble"===b?("Polygon"===f?(g(d,l),h.push("Z")):"MultiPolygon"===f&&(g(d,function(a){g(a,l)}),h.push("Z")),h.length&&(k={path:h})):"mapline"===b?("LineString"===f?l(d):"MultiLineString"===f&&g(d,l),h.length&&(k={path:h})):"mappoint"===b&&"Point"===
f&&(k={x:d[0],y:-d[1]});k&&c.push(e(k,{name:a.name||a.NAME,properties:a}))});f&&a.copyrightShort&&(f.chart.mapCredits=n(f.chart.options.credits.mapText,{geojson:a}),f.chart.mapCreditsFull=n(f.chart.options.credits.mapTextFull,{geojson:a}));return c};p(m.prototype,"addCredits",function(a,b){b=r(!0,this.options.credits,b);this.mapCredits&&(b.href=null);a.call(this,b);this.credits&&this.mapCreditsFull&&this.credits.attr({title:this.mapCreditsFull})})})(x);(function(a){function h(a,b,c,e,h,d,g,m){return["M",
a+h,b,"L",a+c-d,b,"C",a+c-d/2,b,a+c,b+d/2,a+c,b+d,"L",a+c,b+e-g,"C",a+c,b+e-g/2,a+c-g/2,b+e,a+c-g,b+e,"L",a+m,b+e,"C",a+m/2,b+e,a,b+e-m/2,a,b+e-m,"L",a,b+h,"C",a,b+h/2,a+h/2,b,a+h,b,"Z"]}var m=a.Chart,g=a.defaultOptions,e=a.each,n=a.extend,r=a.merge,u=a.pick,p=a.Renderer,c=a.SVGRenderer,b=a.VMLRenderer;n(g.lang,{zoomIn:"Zoom in",zoomOut:"Zoom out"});g.mapNavigation={buttonOptions:{alignTo:"plotBox",align:"left",verticalAlign:"top",x:0,width:18,height:18,padding:5},buttons:{zoomIn:{onclick:function(){this.mapZoom(.5)},
text:"+",y:0},zoomOut:{onclick:function(){this.mapZoom(2)},text:"-",y:28}},mouseWheelSensitivity:1.1};a.splitPath=function(a){var b;a=a.replace(/([A-Za-z])/g," $1 ");a=a.replace(/^\s*/,"").replace(/\s*$/,"");a=a.split(/[ ,]+/);for(b=0;b<a.length;b++)/[a-zA-Z]/.test(a[b])||(a[b]=parseFloat(a[b]));return a};a.maps={};c.prototype.symbols.topbutton=function(a,b,c,e,g){return h(a-1,b-1,c,e,g.r,g.r,0,0)};c.prototype.symbols.bottombutton=function(a,b,c,e,g){return h(a-1,b-1,c,e,0,0,g.r,g.r)};p===b&&e(["topbutton",
"bottombutton"],function(a){b.prototype.symbols[a]=c.prototype.symbols[a]});a.Map=a.mapChart=function(b,c,e){var f="string"===typeof b||b.nodeName,g=arguments[f?1:0],d={endOnTick:!1,visible:!1,minPadding:0,maxPadding:0,startOnTick:!1},h,k=a.getOptions().credits;h=g.series;g.series=null;g=r({chart:{panning:"xy",type:"map"},credits:{mapText:u(k.mapText,' \u00a9 \x3ca href\x3d"{geojson.copyrightUrl}"\x3e{geojson.copyrightShort}\x3c/a\x3e'),mapTextFull:u(k.mapTextFull,"{geojson.copyright}")},tooltip:{followTouchMove:!1},
xAxis:d,yAxis:r(d,{reversed:!0})},g,{chart:{inverted:!1,alignTicks:!1}});g.series=h;return f?new m(b,g,e):new m(g,c)}})(x)});
