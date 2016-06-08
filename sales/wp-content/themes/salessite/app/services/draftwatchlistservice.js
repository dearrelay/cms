myApp.service('DraftWatchlistService',
    ['$http','$timeout','BaseService',
    function ($http,$timeout,BaseService) {
	return{
        UpdateWatchListItems: function (series) {
            var seasonIdsArray = [];
		    if (series && series.length > 0) {
                $('#draftListId').show();
                for(var i=0;i<series.length;i++){
                    if(series[i].WatchListSeriesID!==0){
                        $('.' +series[i].SeriesID+'minus').show();
                        $('.' +series[i].SeriesID+'plus').hide();
                        $('#'+series[i].SeriesID+'banner').addClass('removelist-btn').removeClass('addlist-btn');
                        $('#' + series[i].SeriesID + 'banner').text("Remove from watchlists");
                        if (seasonIdsArray.indexOf(series[i].SeriesID) === -1) {
                            seasonIdsArray.push(series[i].SeriesID);
                        }
                    }
                    if(series[i] && series[i].ProgramType==='series'){
                        seasondetails=series[i].SeasonDetail;
                        
                        for(var j=0;j<seasondetails.length;j++){
                            if(seasondetails[j] && seasondetails[j].ProgramType==='season'){
                                SeasonEpisodeDetails=seasondetails[j].EpisodeDetail;
                                if(seasondetails[j].EpisodeCountBySeason===seasondetails[j].EpisodeCountInWatchList){
                                    $('.' +seasondetails[j].SeasonID+'minus').show();
                                    $('.' +seasondetails[j].SeasonID+'plus').hide();
                                    var seasonAttr = $("span[id$='season']").attr('id');
									if(seasonAttr !== undefined) {
										var splitSeasonId = seasonAttr.split('-');
										if(splitSeasonId[0] === seasondetails[j].SeasonID) {
										    $("span[id$='season']").addClass('removelist-btn').removeClass('addlist-btn');
											$("span[id$='season']").text("Remove Season " + splitSeasonId[1] + (splitSeasonId[2].length===1 ? '-'+splitSeasonId[2]:'') + " from watchlists");
										}
									}
                                    if(seasonIdsArray.indexOf(seasondetails[j].SeasonID) === -1){
                                        seasonIdsArray.push(seasondetails[j].SeasonID);
                                    }
                                   
                                }
                                for (var k = 0; k < SeasonEpisodeDetails.length; k++) {
                                    if (seasonIdsArray.indexOf(SeasonEpisodeDetails[k].PieceID) === -1) {
                                        seasonIdsArray.push(SeasonEpisodeDetails[k].PieceID);
                                    }
                                    $('.' + SeasonEpisodeDetails[k].PieceID + 'minus').show();
                                    $('.' + SeasonEpisodeDetails[k].PieceID + 'plus').hide();
                                    $("span[id$='episode']").each(function () {
                                        if ($(this).attr('id') === SeasonEpisodeDetails[k].PieceID + 'episode') {
                                            $(this).addClass('removelist-btn').removeClass('addlist-btn');
                                            $(this).text("Remove Episode from watchlists");
                                        }
                                    })
                                }
                            }
                        }
                    } else if(series[i] && (series[i].ProgramType==='piece' || series[i].SubProgramType==='Movie')) {
                        if(seasonIdsArray.indexOf(series[i].SeriesID) === -1){
                            seasonIdsArray.push(series[i].SeriesID);
                        }
                        $('.' +series[i].SeriesID+'minus').show();
                        $('.' + series[i].SeriesID + 'plus').hide();
                        $("span[id$='episode']").each(function () {
                            if ($(this).attr('id') === series[i].SeriesID + 'episode') {
                                $(this).addClass('removelist-btn').removeClass('addlist-btn');
                                $(this).text("Remove Episode from watchlists");
                            }
                        })
                        $('#' + series[i].SeriesID + 'banner').addClass('removelist-btn').removeClass('addlist-btn');
                        $('#' + series[i].SeriesID + 'banner').text("Remove from watchlists");
                    }
                }
                window.sessionStorage.setItem("seasonIdsArray", seasonIdsArray);    
		    } else {
                window.sessionStorage.setItem("seasonIdsArray","");
                $('#draftListId').hide();
            }
        }
	}
}]);