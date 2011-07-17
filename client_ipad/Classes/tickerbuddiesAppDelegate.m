//
//  tickerbuddiesAppDelegate.m
//  tickerbuddies
//
//  Created by Anna on 7/16/11.
//  Copyright 2011 __MyCompanyName__. All rights reserved.
//

#import "tickerbuddiesAppDelegate.h"
#import "tickerbuddiesViewController.h"

@implementation tickerbuddiesAppDelegate

@synthesize window;
@synthesize viewController;
@synthesize offsetTime;

#pragma mark -
#pragma mark Application lifecycle

- (BOOL)application:(UIApplication *)application didFinishLaunchingWithOptions:(NSDictionary *)launchOptions {    
    
	NSString *dID = [[UIDevice currentDevice] uniqueIdentifier];
	NSLog(@"the device id: %@",dID);
	NSString *getPostStr = [NSString stringWithFormat:@"http://socialpong.org/tickerbuddies/getPos.php?dID=%@&a=join",dID];
	NSLog(@"the url: %@", getPostStr);
	int position = [self urlCall:getPostStr];
	NSString *getEndTimeStr = [NSString stringWithFormat:@"http://socialpong.org/tickerbuddies/getEndTime.php?p=%d",position];
	offsetTime = [NSNumber numberWithFloat:[[self urlCall:getEndTimeStr] floatValue]];
	NSLog(@"the msg: %d",position);
	// Override point for customization after app launch. 
    [self.window addSubview:viewController.view];
    [self.window makeKeyAndVisible];

	return YES;
}

-(NSString *)getMessage{
	NSString *getMStr = @"http://socialpong.org/tickerbuddies/getM.php";		
	return [self urlCall:getMStr];
}

- (void)applicationWillResignActive:(UIApplication *)application {
    /*
     Sent when the application is about to move from active to inactive state. This can occur for certain types of temporary interruptions (such as an incoming phone call or SMS message) or when the user quits the application and it begins the transition to the background state.
     Use this method to pause ongoing tasks, disable timers, and throttle down OpenGL ES frame rates. Games should use this method to pause the game.
     */
}


- (void)applicationDidBecomeActive:(UIApplication *)application {
    /*
     Restart any tasks that were paused (or not yet started) while the application was inactive. If the application was previously in the background, optionally refresh the user interface.
     */
}


- (void)applicationWillTerminate:(UIApplication *)application {
    /*
     Called when the application is about to terminate.
     See also applicationDidEnterBackground:.
     */
}

- (NSString *)urlCall:(NSString *)url{
	NSError* error;

	NSURL *theUrl = [NSURL URLWithString:url];
	NSString* text = [NSString stringWithContentsOfURL:theUrl encoding:NSASCIIStringEncoding error:&error];
	return text;
}


#pragma mark -
#pragma mark Memory management

- (void)applicationDidReceiveMemoryWarning:(UIApplication *)application {
    /*
     Free up as much memory as possible by purging cached data objects that can be recreated (or reloaded from disk) later.
     */
}


- (void)dealloc {
	[offsetTime release];
    [viewController release];
    [window release];
    [super dealloc];
}


@end
