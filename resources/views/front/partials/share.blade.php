<div class="post-share-options clearfix">
                                	<div class="pull-left">
                                    	<div class="share">Compartir</div>
                                    </div>
                                    <div class="pull-right">
                                    	<ul class="social-icon-one">
                                            <li>
                                                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('frontend.post', $post->slug) }}"><span class="fa fa-facebook"></span>
                                                </a>
                                            </li>

                                            <li>
                                                <a target="_blank" href="https://twitter.com/intent/tweet?text={{ route('frontend.post', $post->slug) }}"><span class="fa fa-twitter"></span>
                                                </a>
                                            </li>

                                            {{-- INSERT MORE OPTIONS --}}
                                        </ul>
                                    </div>
                                </div>