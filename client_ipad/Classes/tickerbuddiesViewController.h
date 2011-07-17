//
//  tickerbuddiesViewController.h
//  tickerbuddies
//
//  Created by Anna on 7/16/11.
//  Copyright 2011 __MyCompanyName__. All rights reserved.
//

#import <UIKit/UIKit.h>
#import <QuartzCore/QuartzCore.h>

@interface tickerbuddiesViewController : UIViewController <UIScrollViewDelegate>{
//	IBOutlet UIScrollView *theSV;
	IBOutlet UILabel *theLabel;
}

//@property (nonatomic, retain) IBOutlet UIScrollView *theSV;
@property (nonatomic, retain) IBOutlet UILabel *theLabel;


@end

