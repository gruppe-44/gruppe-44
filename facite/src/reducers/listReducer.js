import { CONSTANTS } from "../actions";

let listID = 2;
let cardID = 6;

// facite kort
const initialState = [
    {
        title: "Last Episode",
        // string fra ES6
        id: `list-${0}`,
        cards: [
            {
                id: `cards-${0}`,
                text: "static card"
            },
            {
                id: `cards-${1}`,
                text: "hey there dude"
            }
        ]
    },
    {
        title: "This Episode",
        id: `list-${1}`,
        cards: [
            {
                id: `cards-${2}`,
                text: "card 2.0"
            },
            {
                id: `cards-${3}`,
                text: "this is a test do what the fuck you want with it"
            },
            {
                id: `cards-${4}`,
                text: "this is another stupid thing"
            },
            {
                id: `cards-${5}`,
                text:
                "another stupid card"
            }
        ]
    }
];



// facite board funskjoner på hva som skjer hvis du legger nye kort osv
const listsReducer = (state = initialState, action) => {
    switch (action.type) {
        case CONSTANTS.ADD_LIST:
            const newList = {
                title: action.payload,
                cards: [],
                id: `list-${listID}`
            };
            listID += 1;
            return [...state, newList];

            case CONSTANTS.ADD_CARD:
                const newCard = {
                    text: action.payload.text,
                    id: `card-${cardID}`
                }
                cardID += 1;

                const newState = state.map(list => {
                    if(list.id === action.payload.listID) {
                        return {
                            ...list,
                            cards: [...list.cards, newCard]
                        }
                    } else {
                        return list
                    }
                });

                return newState;

                case CONSTANTS.DRAG_HAPPENED:

                    const {  
                        droppableIdStart,
                        droppableIdEnd,
                        droppableIndexEnd,
                        droppableIndexStart,
                        draggableId
                    } = action.payload;
                    const State = [...state];
                    if(droppableIdStart === droppableIdEnd) {

                    }


        default:
            return state; 
    }
};

export default listsReducer;