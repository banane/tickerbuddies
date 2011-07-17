//
//  tickerbuddiesAppDelegate.h
//  tickerbuddies
//
//  Created by Anna on 7/16/11.
//  Copyright 2011 __MyCompanyName__. All rights reserved.
//

#import <UIKit/UIKit.h>

@class tickerbuddiesViewController;

@interface tickerbuddiesAppDelegate : NSObject <UIApplicationDelegate> {
    UIWindow *window;
    tickerbuddiesViewController *viewController;
	NSNumber *offsetTime;
}

@property (nonatomic, retain) IBOutlet UIWindow *window;
@property (nonatomic, retain) IBOutlet tickerbuddiesViewController *viewController;
@property (nonatomic, retain) NSNumber *offsetTime;

-(NSString *)urlCall:(NSString *)url;
-(NSString *)getMessage;

@end

