package io.egen.entity;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;
import java.util.List;

@Data
@AllArgsConstructor
@NoArgsConstructor
public  class BrowseList {
	private String imdbId;
	private String actors;
	private String awards;
	private String country;
	private String director;
	private String genre;
	private String language;
	private String metascore;
	private String plot;
	private String poster;
	private String rated;
	private String released;
	private String runtime;
	private String title;
	private String type;
	private String writer;
	private String year;
	private String imdbRating;
	private String imdbVotes;
	private List<Comments> comments;
}
